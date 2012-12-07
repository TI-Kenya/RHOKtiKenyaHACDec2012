#To use with thin
# thin start -p PORT -R config.ru

require 'sinatra'


# include our Application code
require File.join(File.dirname(__FILE__), 'app.rb')
require File.join(File.dirname(__FILE__), 'api_application.rb')
require File.join(File.dirname(__FILE__), 'admin.rb')
require File.join(File.dirname(__FILE__), 'mobile.rb')

# disable sinatra's auto-application starting
disable :run

#sync logs
$stdout.sync = true

# we're in dev mode
#set :environment, :development

# Mount our Main class with a base url of /
map "/" do
  run WhistleBlowerApp
end

# Mount our Blog class with a base url of /blog
map "/api" do
  run ApiApplication
end

# Mount our Admin class with a base url of /admin
map "/admin" do
  run AdminApp
end

# Mount our Mobile class with a base url of /mobile
map "/mobile" do
  run MobileApp
end
