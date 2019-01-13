package com.example.saisandeep.findviptest;

import android.app.Service;
import android.content.Intent;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.IBinder;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {
    EditText enteredname;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        enteredname = (EditText)findViewById(R.id.usersearch);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        new Firebasebssidhelper().readBssid(new Firebasebssidhelper.BssidDataStatus() {
            @Override
            public void dataIsLoaded(List<Bssidinfo> bssidInfo, List<String> bssid_keys) {
                copyBssidData(bssidInfo,bssid_keys);
            }

            @Override
            public void dataIsAdded() {

            }

            @Override
            public void dataIsDeleted() {

            }

            @Override
            public void dataIsUpdated() {

            }
        });


        new Firebaseusershelper().readusers(new Firebaseusershelper.UsersDataStatus() {
            @Override
            public void dataIsLoaded(List<Userinfo> usersInfo, List<String> userInfoKeys) {
                copyUserData(usersInfo,userInfoKeys);
            }

            @Override
            public void dataIsAdded(String newKey) {

            }

            @Override
            public void dataIsDeleted() {

            }

            @Override
            public void dataIsUpdated() {

            }
        });

        Thread bssid_update = new Thread(){
           @Override
            public void run(){
               while(!isInterrupted()){

                   try {
                       Thread.sleep(3000);

                       runOnUiThread(new Runnable() {

                           @Override
                           public void run() {

                               WifiManager wifiManager = (WifiManager)getSystemService(getApplicationContext().WIFI_SERVICE);

                               if(wifiManager.isWifiEnabled()){


                                   WifiInfo wifiInfo = wifiManager.getConnectionInfo();
                                   if (String.valueOf(wifiInfo.getSupplicantState()).equals("COMPLETED")) {
                                       String details = "";
                                       details = wifiInfo.getBSSID();
                                       if (!details.equals(user_bssid)) {
                                           displayText(details);
                                           //TextView textView = (TextView)findViewById(R.id.id_specialtextview);
                                           //textView.setText(details);
                                           user_bssid = details;
                                           Userinfo newUser = new Userinfo(username,user_bssid);
                                           new Firebaseusershelper().updateUser(newUser, user_key, new Firebaseusershelper.UsersDataStatus() {
                                               @Override
                                               public void dataIsLoaded(List<Userinfo> usersInfo, List<String> userInfoKeys) {

                                               }

                                               @Override
                                               public void dataIsAdded(String newKey) {

                                               }

                                               @Override
                                               public void dataIsDeleted() {

                                               }

                                               @Override
                                               public void dataIsUpdated() {
                                                  // Toast.makeText(MainActivity.this, "Data is updated", Toast.LENGTH_SHORT).show();
                                               }
                                           });
                                       }
                                   }


                               }
                               else{
                                   wifiManager.setWifiEnabled(true);
                               }

                           }
                       });




                   } catch (InterruptedException e) {
                       e.printStackTrace();
                   }
               }
           }
        };
        getWifiInfo();
        //addUser();
        bssid_update.start();
        startService(new Intent(this, BackgroundUpdate.class));
        username = getIntent().getStringExtra("username");
        checktoadduser();

    }

    public List<Bssidinfo> copy_bssidInfo = new ArrayList<>();
    public List<String> copy_bssidKeys = new ArrayList<>();
    public String bssid_check_data;

    public List<Userinfo> copy_userInfo = new ArrayList<>();
    public List<String> copy_userInfoKeys = new ArrayList<>();
    public String users_check_data;

    public String username;
    public String user_bssid = "" ;
    public String user_key = "";


    public void getWifiInfo(){
        WifiManager wifiManager = (WifiManager)getSystemService(getApplicationContext().WIFI_SERVICE);

        if(wifiManager.isWifiEnabled()){
            Toast.makeText(this, "wifi is enabled", Toast.LENGTH_SHORT).show();
            WifiInfo wifiInfo = wifiManager.getConnectionInfo();

            if(String.valueOf(wifiInfo.getSupplicantState()).equals("COMPLETED")){
                String details;
                details = wifiInfo.getBSSID();
                user_bssid = wifiInfo.getBSSID();
                displayText(details);
                Toast.makeText(this, details, Toast.LENGTH_SHORT).show();
            }
            else{
                Toast.makeText(this, "Please connect to wifi ", Toast.LENGTH_SHORT).show();
            }
        }
        else{
            wifiManager.setWifiEnabled(true);
            Toast.makeText(this, "Wifi was off and turned on", Toast.LENGTH_SHORT).show();
        }
    }


    public void checkUsers(View view){
        users_check_data = "";
        String temp1 = "";
        String temp2 = "";
        for(int i=0;i<copy_userInfo.size();i++){
            temp1 = temp1 + copy_userInfo.get(i).getUserName()+ " ";
        }

        for(int i=0;i<copy_userInfoKeys.size();i++){
            temp2 = temp2 + copy_userInfoKeys.get(i)+ " ";
        }

        users_check_data = temp1 + " " + temp2;

        displayText(users_check_data);

    }


    public void checkDatabase(View view){
        bssid_check_data = "";
        String temp1 = "";
        String temp2 = "";
        for(int i=0;i<copy_bssidInfo.size();i++){
            temp1 = temp1 + copy_bssidInfo.get(i).getBssid()+ " ";
        }

        for(int i=0;i<copy_bssidKeys.size();i++){
            temp2 = temp2 + copy_bssidKeys.get(i)+ " ";
        }

        bssid_check_data = temp1 + " " + temp2;

        displayText(bssid_check_data);
    }

    public void displayText(String data){
        TextView textView = (TextView)findViewById(R.id.id_textView);
        textView.setText(data);
    }



    public void copyBssidData(List<Bssidinfo> bssidInfo, List<String> bssid_keys){
        copy_bssidInfo.clear();
        for(int i=0;i<bssidInfo.size();i++){
            copy_bssidInfo.add(bssidInfo.get(i));
        }


        copy_bssidKeys.clear();
        for(int i=0;i<bssid_keys.size();i++){
            copy_bssidKeys.add(bssid_keys.get(i));
        }
    }

    public void copyUserData(List<Userinfo> usersInfo, List<String> userInfoKeys){
        copy_userInfo.clear();
        for(int i=0;i<usersInfo.size();i++){
            copy_userInfo.add(usersInfo.get(i));
        }
        copy_userInfoKeys.clear();
        for(int i=0;i<userInfoKeys.size();i++){
            copy_userInfoKeys.add(userInfoKeys.get(i));
        }

    }

    public void addUser(){
        WifiManager wifiManager = (WifiManager)getSystemService(getApplicationContext().WIFI_SERVICE);

        if(wifiManager.isWifiEnabled()){
            WifiInfo wifiInfo = wifiManager.getConnectionInfo();
            if(String.valueOf(wifiInfo.getSupplicantState()).equals("COMPLETED")){
                String tempbssid = wifiInfo.getBSSID();
                Userinfo thisuser = new Userinfo(username,tempbssid);
                new Firebaseusershelper().addUser(thisuser, new Firebaseusershelper.UsersDataStatus() {
                    @Override
                    public void dataIsLoaded(List<Userinfo> usersInfo, List<String> userInfoKeys) {

                    }

                    @Override
                    public void dataIsAdded(String newKey) {
                        Toast.makeText(MainActivity.this, "Data is added", Toast.LENGTH_SHORT).show();
                        user_key = newKey;
                    }

                    @Override
                    public void dataIsDeleted() {

                    }

                    @Override
                    public void dataIsUpdated() {

                    }
                });
            }
            else{
                Toast.makeText(this, "Connect to a wifi networt and try again", Toast.LENGTH_SHORT).show();
            }
        }
        else{
            wifiManager.setWifiEnabled(true);
        }
    }




    /*
    public void update_bssid(View view){

        WifiManager wifiManager = (WifiManager)getSystemService(getApplicationContext().WIFI_SERVICE);

        if(wifiManager.isWifiEnabled()){
            while(true) {

                WifiInfo wifiInfo = wifiManager.getConnectionInfo();
                if (String.valueOf(wifiInfo.getSupplicantState()).equals("COMPLETED")) {
                    String details;
                    details = wifiInfo.getBSSID();
                    if (details != user_bssid) {
                        displayText(details);
                        user_bssid = details;
                    }
                }

            }
        }
        else{
            wifiManager.setWifiEnabled(true);
        }

    }
    */
    /*

    public void specialTextView(String data){
        TextView textView = (TextView)findViewById(R.id.id_specialtextview);
        textView.setText(data);
    }
*/


    public void findLocationFromBssid(String bssid){
        int temp = 0;
        String location = "";
        for(int i=0;i<copy_bssidInfo.size();i++){
            if(copy_bssidInfo.get(i).getBssid().equals(bssid)){
                temp = 1;
                location = copy_bssidInfo.get(i).getLocation().toString();
            }
        }
        if(temp == 1){
            Toast.makeText(this, "location", Toast.LENGTH_LONG).show();
        }
    }

    void checktoadduser(){
        int temp =0;
        String tempKey = "" ;
        for(int i=0;i<copy_userInfo.size();i++){
            if(copy_userInfo.get(i).getUserName().equals(username)){
                tempKey = copy_userInfoKeys.get(i);
                user_key = tempKey;
                temp = 1;
            }
            if(temp ==0){
                addUser();
            }
        }
    }

    public void userSearch(View view){
        String enteredName = enteredname.getText().toString();


        int temp =0;
        String bssidofsearch = "" ;
        for(int i=0;i<copy_userInfo.size();i++){
            if(copy_userInfo.get(i).getUserName().equals(username)){
                bssidofsearch = copy_userInfo.get(i).getBssid();
                temp = 1;
            }
            if(temp == 0){
                Toast.makeText(this, "user not found", Toast.LENGTH_SHORT).show();
            }
            if(temp == 1){
                findLocationFromBssid(bssidofsearch);
            }
        }

    }

}
