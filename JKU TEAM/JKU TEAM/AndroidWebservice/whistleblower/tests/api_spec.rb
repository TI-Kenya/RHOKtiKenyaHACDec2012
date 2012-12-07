require "rspec"
require_relative '../api_application'
require 'rspec-expectations'
require 'rack/test'
require 'pry'
require 'json'

set :environment, :test


describe "The Api Application" do
  def common_setup
    common_delete
  end

  def common_delete
    Admin.delete_all
    Report.delete_all
  end

  def app
    ApiApplication
  end


  #before(:each) do
  #  common_delete
  #end
  #
  #describe "Home page" do
  #
  #  it "should create a user" do
  #    user = {
  #        :email => "joyce@echessa.com",
  #        :password => "h3ll0p@ssword",
  #        :phone_number => "254705866564"
  #    }
  #    Admin.delete_all
  #
  #    post "/admins", user.to_json
  #    last_response.should be_ok
  #    created_id = last_response.body
  #    Admin.find_by_id!(created_id)
  #  end
  #
  #  it "should return all users" do
  #    get "/admins"
  #    last_response.should be_ok
  #    last_response.body.should == Admin.all.to_json
  #  end
  #
  #  it "should return a user" do
  #    admin = Admin.create!(:email => "sdf@email.com", :phone_number => "25476547654ds3", :password => "8373jdddsff")
  #    get "/admins/#{admin.id}"
  #
  #    last_response.should be_ok
  #    last_response.body.should == admin.to_json
  #  end
  #
  #  it "should update a user" do
  #    admin = Admin.create!(:email => "test@email.com", :phone_number => "254765476543", :password => "8373jdddff")
  #
  #    updated = {
  #        :phone_number => "254876654332",
  #        :password => "p@ssw0rd",
  #        :email => "me@you.com"
  #    }
  #
  #    patch "/admins/#{admin.id}", updated.to_json
  #    last_response.should be_ok
  #    admin = Admin.find_by_id(admin.id)
  #
  #    admin.phone_number.should == "254876654332"
  #    admin.password.should == "p@ssw0rd"
  #    admin.email.should == "me@you.com"
  #  end
  #
  #  it "should delete a user" do
  #    admin = Admin.create!(:email => "sdf@emajjil.com", :phone_number => "25476547654ds3", :password => "8373jdddsff")
  #    delete "/admins/#{admin.id}"
  #
  #    last_response.should be_ok
  #    admin = Admin.find_by_id(admin.id)
  #    admin.should be_nil
  #  end
  #
  #end

  describe "populate database" do
    it "should populate the database" do
      Admin.delete_all
      Report.delete_all

      admin01 = Admin.new
      admin01.email = "user@user.com"
      admin01.password = "user123"
      admin01.save!

      admin02 = Admin.new
      admin02.email = "admin@admin.com"
      admin02.password = "admin123"
      admin02.save!

      report01 = Report.new
      report01.message = "I wish to report a case of bribery I witness often along watsis road. Police keep on taking bribes from public transport vehicles"
      report01.sector = "security"
      report01.source = "Kigali"
      report01.save!

      report02 = Report.new
      report02.message = "I wish to report a case of unacconted for drug money at Kigali National Hospital"
      report02.sector = "health"
      report02.source = "Butare"
      report02.save!

      report03 = Report.new
      report03.message = "I witnessed police officers beating up a man they had accused of theft"
      report03.sector = "security"
      report03.source = "Kigali"
      report03.save!

      report04 = Report.new
      report04.message = "Drugs keep on dissapearing at Butare clinic"
      report04.sector = "health"
      report04.source = "Butare"
      report04.save!

      report05 = Report.new
      report05.message = "The police in Butare are known to collaborate with known thugs"
      report05.sector = "security"
      report05.source = "Butare"
      report05.save!

      report06 = Report.new
      report06.message = "Healthcare in Kigali is deteriorating despite the high taxes collected"
      report06.sector = "health"
      report06.source = "Kigali"
      report06.save!

      report07 = Report.new
      report07.message = "I saw a man who had been caught by the police give them money and be let go"
      report07.sector = "security"
      report07.source = "Kigali"
      report07.save!

      report08 = Report.new
      report08.message = "I witnessed someone at the passport registration center accepting a bribe to get someone a passport"
      report08.sector = "immigration"
      report08.source = "Kigali"
      report08.save!

      report09 = Report.new
      report09.message = "My next door neighbours have an illegal immigrant in their house. He crossed the border and never left"
      report09.sector = "immigration"
      report09.source = "Kibungo"
      report09.save!

      report10 = Report.new
      report10.message = "Watsis Club is really a front for child trafficking"
      report10.sector = "immigration"
      report10.source = "Kibungo"
      report10.save!

      report11 = Report.new
      report11.message = "I witnessed someone at the passport registration center accepting a bribe to get someone a passport"
      report11.sector = "immigration"
      report11.source = "Butare"
      report11.save!

      report12 = Report.new
      report12.message = "My next door neighbours have an illegal immigrant in their house. He crossed the border and never left"
      report12.sector = "immigration"
      report12.source = "Kigale"
      report12.save!

      report13 = Report.new
      report13.message = "Watsis Club is really a front for child trafficking"
      report13.sector = "immigration"
      report13.source = "Butare"
      report13.save!

    end
  end

end