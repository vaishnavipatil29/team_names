package com.example.saisandeep.findviptest;

import android.support.annotation.NonNull;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;

public class Firebaselogindetailhelper {
    private FirebaseDatabase mlogindetaildatabase;
    private DatabaseReference mlogindatabasereference;
    public List<LoginInfo> logindetails = new ArrayList<>();
    public List<String> logindetailkeys = new ArrayList<>();

    public Firebaselogindetailhelper() {
        mlogindetaildatabase = FirebaseDatabase.getInstance();
        mlogindatabasereference = mlogindetaildatabase.getReference("login");
    }


    public interface Logindatastatus{
        void dataisloaded(List<LoginInfo> logindetails, List<String> logindetailkeys);
        void dataisadded(String newkey);
        void dataisdeleted();
        void dataisupdated();
    }

    public void readlogin(final Logindatastatus logindatastatus){
        mlogindatabasereference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                logindetails.clear();
                logindetailkeys.clear();
                for(DataSnapshot keyNode : dataSnapshot.getChildren()){
                    logindetailkeys.add(keyNode.getKey());
                    LoginInfo temp = keyNode.getValue(LoginInfo.class);
                    logindetails.add(temp);
                }
                logindatastatus.dataisloaded(logindetails,logindetailkeys);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }
}


