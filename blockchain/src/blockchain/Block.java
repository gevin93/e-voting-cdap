package blockchain;

//import static blockchain.Blockchain.blockchain;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.io.Serializable;
import java.util.Date;

public class Block implements Serializable{
    


 
	public String hash;
	public String previousHash; 
	private String data; //our data will be a simple message.
         private String id;
	private long timeStamp; //as number of milliseconds since 1/1/1970.
	private int nonce;
    
	
	//Block Constructor.  
	public Block(String data,String previousHash ) {
            ////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////////////
                
                         StringBuilder sb=new StringBuilder();
            try { 
                    FileReader textFileReader = new FileReader("/home/rajeewa/Desktop/bitsecure/hash"); 
                    BufferedReader bufReader = new BufferedReader(textFileReader);

 

                    char[] buffer = new char[8096];


                    int numberOfCharsRead = bufReader.read(buffer); 
                    {
                     sb.append(String.valueOf(buffer, 0, numberOfCharsRead)); 
                     numberOfCharsRead = textFileReader.read(buffer);

                    } 

                    while (numberOfCharsRead != -1) 
                    { 
                        sb.append(String.valueOf(buffer, 0, numberOfCharsRead)); 
                        numberOfCharsRead = textFileReader.read(buffer); 
                    }

                    bufReader.close();
                 } 

                catch (IOException e) 
                { 
                     //String cid="0";
                    e.printStackTrace();
                }

            String cid =  sb.toString();
            ////////////////////////////////////////////////
            
             
                
                
                this.id=cid;
		this.data = data;
		this.previousHash = previousHash;
		this.timeStamp =new Date().getTime();
                
		this.hash = calculateHash(); //Making sure we do this after we set the other values.
	}
	
	//Calculate new hash based on blocks contents
	public String calculateHash() {
		String calculatedhash = StringUtil.applySha256( 
				previousHash +
				Long.toString(timeStamp) +
				Integer.toString(nonce) + 
				data 
				);
		return calculatedhash;
	}
	
	public void mineBlock(int difficulty)
        {
		String target = new String(new char[difficulty]).replace('\0', '0'); //Create a string with difficulty * "0" 
		while(!hash.substring( 0, difficulty).equals(target)) {
			nonce ++;
			hash = calculateHash();
		}
		System.out.println("Block Mined!!! : " + hash);
	}
        
}

