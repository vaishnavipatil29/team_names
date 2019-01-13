package com.example.saisandeep.findviptest;

public class Userinfo {
    private String userName;
    private String bssid;


    public Userinfo() {
    }


    public Userinfo(String userName, String bssid) {
        this.userName = userName;
        this.bssid = bssid;
    }


    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public String getBssid() {
        return bssid;
    }

    public void setBssid(String bssid) {
        this.bssid = bssid;
    }
}
