require 'rubygems'
require 'sinatra'
require 'pry'
require 'haml'
require 'time'
require_relative 'api_application'
require 'sinatra/reloader' if development? or test?

class MobileApp < Sinatra::Base


  get '/' do
    haml :"mobile/mobile", :layout => :mobile
  end

end