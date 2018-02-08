/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package blockchain;

import static blockchain.Blockchain.blockchain;
import static blockchain.Blockchain.difficulty;

import com.google.gson.GsonBuilder;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

/**
 *
 * @author rajeewa
 */
public class genesisCreator {
    
    public static void main(String[] args) throws IOException {	
		//add our blocks to the blockchain ArrayList:
		 
		blockchain.add(new Block("genesis block", "0"));
		System.out.println("Trying to Mine genesis block...");
		blockchain.get(0).mineBlock(difficulty);
               String gen_hash=blockchain.get(0).hash;
                
       
               
               
               
              /*
               String blockchainJson = new GsonBuilder().setPrettyPrinting().create().toJson(blockchain);
		System.out.println("\nThe block chain: ");
		System.out.println(blockchainJson);
               */ 
                 BufferedWriter output = null;
        try {
            File file = new File("/home/rajeewa/Desktop/ledger","genesis_block");
            output = new BufferedWriter(new FileWriter(file));
            output.write(gen_hash);
               
        } catch ( IOException e ) {
            e.printStackTrace();
        } finally {
          if ( output != null ) {
            output.close();
          }
        }
        
         Blockchain b=new Blockchain();
                b.call();
               
            
    }
    
}
