package com.WhistleBlower;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.Statement;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

/**
 *
 * @author Dan
 */
public class Database {

    static Connection conn;
    static Statement stmt;

    public static void connect() {
        try {
            //load the drivers
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/whistle_blower", "root", "");
            stmt = conn.createStatement();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static void close() {

        try {
            if (conn != null) {
                conn.close();
                stmt.close();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

   
   

    public static String RegisterStudent(String source, String message) {

        //boolean success = false;
    	String insertstatus = "";
    	
        Database.connect();
        
        String inserted = "INSERT INTO health (Source_Area,Message) VALUES ('" + source + "','" + message + "')";
        try {
            Database.stmt.executeUpdate(inserted);
            System.out.println("Inserting...");  
            
            Database.close();
        } catch (Exception e) {
            //success = false;
            e.printStackTrace();
        }
        return insertstatus;
    }
    public static String ImmigrationRegistration(String source,String message){
        String insertstatus="";
        Database.connect();
        String inserted = "INSERT INTO immigration (Source_Area,Message) VALUES ('" + source + "','" + message + "')";
        Database.close();
        return insertstatus;
    }
    public static String security(String source,String message){
        String insertstatus="";
        Database.connect();
        String inserted = "INSERT INTO security (Source_Area,Message) VALUES ('" + source + "','" + message + "')";
        Database.close();
        return insertstatus;
    }
    
    
    public static String getBalance(String admno) {
        ResultSet rs;
        ResultSetMetaData meta = null;
        String bal = "";
        Database.connect();
        String findResult = "SELECT comments from fee WHERE AdmNo='1'";
       
        try {
            rs = Database.stmt.executeQuery(findResult);
            meta = rs.getMetaData();
            if (rs.next())//if results are found in the database
            {
                 bal= meta.getColumnName(1).toUpperCase() + ":" + rs.getString(1) + "\n";
                        
            } 
            else {
                bal = "Our system is expecting some delay we wil get back to you in a while";
            }

            Database.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return bal;
    }

   
    
    
    
    
    

   
}



