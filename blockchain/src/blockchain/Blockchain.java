/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package blockchain;


import static blockchain.ThreadA.blockchain1;
import java.util.ArrayList;
import com.google.gson.GsonBuilder;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author rajeewa
 */
public class Blockchain {

   public static ArrayList<Block> blockchain = new ArrayList<Block>();
    public static int difficulty = 5;
    

  public void call()
  {
      
      
      
        try {
            Thread.sleep(1);
            ///////////////////////////////////////////////////////
                    StringBuilder sb = new StringBuilder();
       
            
            try {
            FileReader textFileReader = new FileReader("/home/rajeewa/Desktop/encrypted_vote/a6t3e8w2b5v9h0k3r5l9z6q3");
            //save file with another name
            BufferedReader bufReader = new BufferedReader(textFileReader);

            char[] buffer = new char[8096];

            int numberOfCharsRead = bufReader.read(buffer);
            {
                sb.append(String.valueOf(buffer, 0, numberOfCharsRead));
                numberOfCharsRead = textFileReader.read(buffer);

            }

            while (numberOfCharsRead != -1) {
                sb.append(String.valueOf(buffer, 0, numberOfCharsRead));
                numberOfCharsRead = textFileReader.read(buffer);
            }

            bufReader.close();
        } catch (IOException f) {

            f.printStackTrace();
        }

        String encrName = sb.toString();

        ////////////////////////////////////////////////////////////////////////////////////////////
        StringBuilder sb1 = new StringBuilder();
        try {
            FileReader textFileReader = new FileReader("/home/rajeewa/Desktop/ledger/genesis_block");
            BufferedReader bufReader = new BufferedReader(textFileReader);

            char[] buffer = new char[8096];

            int numberOfCharsRead = bufReader.read(buffer);
            {
                sb1.append(String.valueOf(buffer, 0, numberOfCharsRead));
                numberOfCharsRead = textFileReader.read(buffer);

            }

            while (numberOfCharsRead != -1) {
                sb1.append(String.valueOf(buffer, 0, numberOfCharsRead));
                numberOfCharsRead = textFileReader.read(buffer);
            }

            bufReader.close();
        } catch (IOException f1) {

            f1.printStackTrace();
        }

        String gen_hash = sb1.toString();
   /////////////////////////////////////////////////////////////////////////////////////////////    
     //  boolean r=blockchain.isEmpty();

        try {
             FileInputStream fis = new FileInputStream("/home/rajeewa/Desktop/ledger/arraylist");
             ObjectInputStream ois = new ObjectInputStream(fis);
            blockchain = (ArrayList) ois.readObject();
            ois.close();
        } catch(Exception e) {
             e.printStackTrace();
        }
     
     
     
     

       
             boolean r=blockchain.isEmpty();
             
               if (r==true) {
            
            blockchain.add(new Block(encrName, gen_hash));
            System.out.println("Trying to Mine block 0");
            blockchain.get(0).mineBlock(difficulty);
            
          try {
                FileOutputStream fos = new FileOutputStream("/home/rajeewa/Desktop/ledger/arraylist");
                ObjectOutputStream oos = new ObjectOutputStream(fos);
                oos.writeObject(blockchain);
                oos.close();
                } catch(Exception e) {
                    e.printStackTrace();
                }
 
            }
              
               
               
               else 
               {
               
                    blockchain.add(new Block(encrName, blockchain.get(blockchain.size() - 1).hash));
                    System.out.println("Trying to Mine block "+ blockchain.size() +"... ");
                    blockchain.get(blockchain.size()-1).mineBlock(difficulty);
                    
                    
                try {
                        FileOutputStream fos = new FileOutputStream("/home/rajeewa/Desktop/ledger/arraylist");
                        ObjectOutputStream oos = new ObjectOutputStream(fos);
                        oos.writeObject(blockchain);
                        oos.close();
                        } catch(Exception e) {
                            e.printStackTrace();
                        }
 
           
               }
       
     


        
//        System.out.println("\nBlockchain is Valid: " + isChainValid());

        String blockchainJson = new GsonBuilder().setPrettyPrinting().create().toJson(blockchain);
        System.out.println("\nThe block chain: ");
        System.out.println(blockchainJson);

        ///////////////////////////////////////////////////
        //String msg1 =  sb.toString();
        BufferedWriter output = null;
     
        
        try {
            File file = new File("/home/rajeewa/Desktop/ledger", "ledger");
            output = new BufferedWriter(new FileWriter(file));
            output.write(blockchainJson);
        } catch (IOException f2) {
            f2.printStackTrace();
        } finally {
            if (output != null) {
                try {
                    output.close();
                } catch (IOException ex) {
                    Logger.getLogger(Blockchain.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        }
        
    
     
            //////////////////////////////////////////////////////
           
        } catch (InterruptedException e) {
           
        }
  }
        
        public static Boolean isChainValid() {
        Block currentBlock;
        Block previousBlock;
        String hashTarget = new String(new char[difficulty]).replace('\0', '0');

        //loop through blockchain to check hashes:
        for (int i = 1; i < blockchain.size(); i++) {
            currentBlock = blockchain.get(i);//////////
            previousBlock = blockchain.get(i - 1);
            //compare registered hash and calculated hash:
            if (!currentBlock.hash.equals(currentBlock.calculateHash())) {
                System.out.println("Current Hashes not equal");
                return false;
            }
            //compare previous hash and registered previous hash
            if (!previousBlock.hash.equals(currentBlock.previousHash)) {
                System.out.println("Previous Hashes not equal");
                return false;
            }
            //check if hash is solved
            if (!currentBlock.hash.substring(0, difficulty).equals(hashTarget)) {
                System.out.println("This block hasn't been mined");
                return false;
            }
        }
        return true;
  
    }
    
    
}
    
  ///////////////////////////////////////////////////////////////////////////////////////////////////
           
        
        
      /////////////////////////////////////////////////////////
        
    
    
    
    
     
   


