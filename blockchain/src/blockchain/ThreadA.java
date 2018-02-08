/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package blockchain;


import com.google.gson.GsonBuilder;
import java.io.FileInputStream;
import java.io.ObjectInputStream;
import java.util.ArrayList;
import javafx.scene.chart.PieChart.Data;

/**
 *
 * @author rajeewa
 */

    
    public class ThreadA {
        
        public static ArrayList<Block> blockchain1 = new ArrayList<Block>();
    public static void main(String[] args) throws InterruptedException{
        
       
try {
    FileInputStream fis = new FileInputStream("/home/rajeewa/Desktop/ledger/arraylist");
    ObjectInputStream ois = new ObjectInputStream(fis);
    blockchain1 = (ArrayList) ois.readObject();
    ois.close();
} catch(Exception e) {
    e.printStackTrace();
}

String blockchainJson = new GsonBuilder().setPrettyPrinting().create().toJson(blockchain1);
        System.out.println("\nThe block chain: ");
        System.out.println(blockchainJson);


    }
} 
        

    

