require 'rubygems'
require 'sinatra'
require 'sinatra/json'
require 'sinatra/rabbit'
require 'sinatra/reloader' if development?
require 'dm-core'
require 'mongo_mapper'
require 'rufus/scheduler'
require 'gcal4ruby'
require 'time'
require_relative 'models'
require 'newrelic_rpm' if production?
require 'pry'

module Sinatra
  class Base
    private

    def self.request_method(*meth)
      condition do
        this_method = request.request_method.downcase.to_sym
        if meth.respond_to?(:include?) then
          meth.include?(this_method)
        else
          meth == this_method
        end
      end
    end
  end
end


class ApiApplication < Sinatra::Base
  include Sinatra::Rabbit


  configure :development do
    register Sinatra::Reloader
  end

  configure do
    enable :logging
    set :public_folder, Proc.new { File.join(root, "static") }

    if ENV['MONGOHQ_URL']
      uri = URI.parse(ENV['MONGOHQ_URL'])
      MongoMapper.connection = Mongo::Connection.from_uri(ENV['MONGOHQ_URL'])
      MongoMapper.database = uri.path.gsub(/^\//, '')
    else
      MongoMapper.database = "whistle"
    end

    enable :sessions
  end

  before  '/*', :request_method => [ :get ] do
    content_type :json
  end

  post '/report' do
    message = params[:message]
    sector = params[:sector]
    source = params[:source]

    report = Report.new
    report.message = message
    report.sector = sector
    report.source = source
    report.save!
    status 200
  end

  post '/delete_report' do
    Report.delete([ params[:id] ])
    status 200

  end

  post '/save_report' do
    report = Report.find_by_id(params[:id])
    report.confirmed = true
    report.save!
    status 200

  end

  get '/unconfirmed_reports' do
    reports = Report.find_all_by_confirmed(false)
    status 200
    body(reports.to_json)

  end

  collection :describe do
    description "What is this API capable of?"

    operation :index do
      description "For developers use only"

      control do
        status 200
        body({
                 :version => "1.0",
                 :is_production => production?,
                 :is_test => test?,
                 :is_development => development?,
                 :is_prod => settings.is_prod
             }.to_json)
      end
    end
  end

  
  collection :admins do
    description "API operations for managing admins"

    operation :index do
      description "Return all admins"
      control do
        admins = Admin.all
        status 200
        body(admins.to_json)
      end
    end
    
    operation :show do
      description "Get a specific admin"
      
      param :id, :string, :required
      control do
        admin = Admin.find_by_id(params[:id])
        if admin.nil?
          status 404
        else
          status 200
          body(admin.to_json)
        end
      end
    end
    
    operation :destroy do
      description "Delete a specific admin"
      
      param :id, :string, :required
      control do
        Admin.delete([ params[:id] ])
        body(params[:id])
      end
    end
    
    operation :create do
      description "Create an admin"
      
      control do
        data = JSON.parse(request.body.string)
        if data.nil? or !data.has_key?('email') or !data.has_key?('password')
          status 400
          body({error: "Invalid data"}.to_json)
        else
          admin = Admin.new
          admin.email = data['email']
          admin.password = data['password']
          admin.save!
          status 200
          body(admin.id.to_s)
        end
      end
    end
    
    operation :update do
      description "Update an existing admin"
      
      control do
        admin = Admin.find(params[:id])
        data = JSON.parse(request.body.string)
        if data.nil? or !data.has_key?('email') or !data.has_key?('phone_number')
          status 404
        else
          admin.email = data['email']
          if data.has_key?('password')
            admin.password = data['password']
          end
          admin.save!
          status 200
          body(admin.id.to_s)
        end
      end
    end
  end
  
  collection :reports do
    description "API operations for managing reports"

    operation :index do
      description "Return all reports"
      control do
        reports = Report.all
        status 200
        body(reports.to_json)
      end
    end
    
    operation :show do
      description "Get a specific report"
      
      param :id, :string, :required
      control do
        report = Report.find_by_id(params[:id])
        if report.nil?
          status 404
        else
          status 200
          body(report.to_json)
        end
      end
    end
    
    operation :destroy do
      description "Delete a specific report"
      
      param :id, :string, :required
      control do
        Report.delete([ params[:id] ])
        body(params[:id])
      end
    end
    
    operation :create do
      description "Create a report"
      
      control do
        data = JSON.parse(request.body.string)
        if data.nil? or !data.has_key?('message') or !data.has_key?('sector') or !data.has_key?('source')
          status 400
          body({error: "Invalid data"}.to_json)
        else
          report = Report.new
          report.message = data['message']
          report.sector = data['sector']
          report.source = data['source']
          report.save!
          status 200
          body(report.id.to_s)
        end
      end
    end
    
    operation :update do
      description "Update an existing report"
      
      control do
        report = Report.find(params[:id])
        data = JSON.parse(request.body.string)
        if data.nil? or !data.has_key?('message') or !data.has_key?('sector') or !data.has_key?('source')
          status 400
        else
          report.message = data['message']
          report.sector = data['sector']
          report.source = data['source']
          report.save!
          status 200
          body(report.id.to_s)
        end
      end
    end
  end

  # start the server if ruby file executed directly
  #run! if app_file == $0
end