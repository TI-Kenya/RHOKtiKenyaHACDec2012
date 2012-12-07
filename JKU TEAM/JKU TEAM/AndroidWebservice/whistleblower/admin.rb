require 'rubygems'
require 'sinatra'
require 'pry'
require 'haml'
require 'time'
require_relative 'api_application'
require 'sinatra/reloader' if development? or test?

class AdminApp < Sinatra::Base

  helpers do

    def protected!
      unless authorized?
        response['WWW-Authenticate'] = %(Basic realm="Restricted Area")
        throw(:halt, [401, "Not authorized\n"])
      end
    end

    def authorized?
      @auth ||= Rack::Auth::Basic::Request.new(request.env)
      return false unless @auth.provided?
      email = @auth.credentials.first
      password = @auth.credentials.last

      admin = Admin.find_by_email_and_password(email,password)

      @auth.provided? && @auth.basic? && @auth.credentials && !admin.nil?
    end

  end

  get '/' do
    protected!
    reports = Report.find_all_by_sector('health')
    haml :"admin/index", :layout => :admin, :locals => {:reports => reports}
  end

  get '/health' do
    protected!
    reports = Report.find_all_by_sector('health')
    haml :"admin/index", :layout => :admin, :locals => {:reports => reports}
  end

  get '/security' do
    protected!
    reports = Report.find_all_by_sector('security')
    haml :"admin/security", :layout => :admin, :locals => {:reports => reports}
  end

  get '/immigration' do
    protected!
    reports = Report.find_all_by_sector('immigration')
    haml :"admin/immigration", :layout => :admin, :locals => {:reports => reports}
  end

end