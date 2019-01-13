package com.example.saisandeep.findviptest;

import android.app.Service;
import android.content.Intent;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.IBinder;
import android.support.annotation.Nullable;
import android.widget.Toast;

import java.util.List;

public class BackgroundUpdate extends Service {
    public String username = "userr2";
    public String user_bssid;
    public String user_key;

    @Nullable
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {
        // do your jobs here
        onTaskRemoved(intent);

        class UpdateThread extends Thread {
            @Override
            public void run() {
                while(!isInterrupted()){
                    try {
                        Thread.sleep(3000);


                        WifiManager wifiManager = (WifiManager)getSystemService(getApplicationContext().WIFI_SERVICE);

                        if(wifiManager.isWifiEnabled()){

                            WifiInfo wifiInfo = wifiManager.getConnectionInfo();
                            if (String.valueOf(wifiInfo.getSupplicantState()).equals("COMPLETED")) {
                                String details = "";
                                details = wifiInfo.getBSSID();
                                if (!details.equals(user_bssid)) {
                                    //specialTextView(details);
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

                                        }
                                    });
                                }
                            }


                        }
                        else{
                            wifiManager.setWifiEnabled(true);
                        }


                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                }
            }
        }

        //return super.onStartCommand(intent, flags, startId);
        return START_STICKY;

    }

    @Override
    public void onTaskRemoved(Intent rootIntent) {
        Intent restartServiceIntent = new Intent(getApplicationContext(),this.getClass());
        restartServiceIntent.setPackage(getPackageName());
        startService(restartServiceIntent);
        super.onTaskRemoved(rootIntent);
    }
}
