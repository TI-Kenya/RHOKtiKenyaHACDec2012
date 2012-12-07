require 'rspec-expectations'
require 'rack/test'
require 'dm-core'
require_relative '../models'

module TestHelpers

  def common_setup
    common_delete
  end

  def common_delete
    Admin.delete_all
    Message.delete_all
    AdminLog.delete_all
  end
end