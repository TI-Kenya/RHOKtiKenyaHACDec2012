package com.WhistleBlower;


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


import org.smslib.*;
import org.smslib.Message.MessageTypes;
import org.aiti.sms.IAITIInboundMessageNotification;

/**
 *
 * @author Dan
 */
public class Main implements IAITIInboundMessageNotification
{

    /**
     * This method is called by the AITI-SMS runtime library when a message is received.
     * Each message creates a new SimpleApp object to service the message.
     *
     * @param srv The service we received from, can be used to send a response
     * @param gatewayId The id of the gateway that received the message
     * @param msgType The type of the messsage, usually or.smslib.MessageTypes.INBOUND
     * @param msg The The inbound message received
     */
    public void process(Service srv, String gatewayId, MessageTypes msgType, InboundMessage msg) {

        String response = "";
        //receive message and split
        String messageReceived = msg.getText().trim().toUpperCase();
        String request[] = messageReceived.split("-"); 
        String keyword = request[0].toUpperCase();
        OutboundMessage phoneno = new OutboundMessage(msg.getOriginator(), response);
        String me=msg.getOriginator();
        
        if (keyword.equalsIgnoreCase("H"))
        {

            String source = request[1].toUpperCase();
            String message = request[2].toUpperCase();
            
            
            response = Database.RegisterStudent(source,message);
        }
        else if(keyword.equalsIgnoreCase("I")){
            String source=request[1].toUpperCase();
            String message=request[2].toUpperCase();
            response=Database.ImmigrationRegistration(source, message);
        }
        else if(keyword.equalsIgnoreCase("S")){
            String source=request[1].toUpperCase();
            String message=request[2].toUpperCase();
            response=Database.security(source, message);
        }
        else if (keyword.equalsIgnoreCase("HELP"))
        {
            String admno = request[1].toUpperCase();
            response = Database.getBalance(admno);

        }
        
       
        
        response = response + "\nThank you for using WHISTLE BLOWER sms Service.";
        OutboundMessage out = new OutboundMessage(msg.getOriginator(), response);
        //String me=msg.getOriginator();
        System.out.println(me);
        try {
            srv.sendMessage(out);
            
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }
}
