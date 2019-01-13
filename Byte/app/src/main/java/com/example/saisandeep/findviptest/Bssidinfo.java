package com.example.saisandeep.findviptest;

public class Bssidinfo {
    private String bssid;
    private String location;


    public Bssidinfo(String bssid, String location) {
        this.bssid = bssid;
        this.location = location;
    }

    public Bssidinfo() {
    }

    public String getBssid() {
        return bssid;
    }

    public void setBssid(String bssid) {
        this.bssid = bssid;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }
}
