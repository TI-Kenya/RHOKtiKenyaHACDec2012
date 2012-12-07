require 'mongo_mapper'

class Report
  include MongoMapper::Document

  key :message, String
  key :sector, String
  key :source, String
  key :confirmed, Boolean, :default => false
  key :sent, Time, :default => Time.now

end


class Admin
  include MongoMapper::Document

  key :email, String
  key :password, String
end

