require 'rubygems'
require 'sinatra'
require 'haml'
require_relative 'api_application'


class WhistleBlowerApp < Sinatra::Base

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

  configure do
    use Rack::Session::Pool, :expire_after => 86400 # 1 day
  end

  get '/' do
    haml :home, :layout => :layout
  end

  get '/report' do
    haml :report, :layout => :layout
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

  configure do
    set :public_folder, Proc.new { File.join(root, "static") }
    enable :sessions
  end
end