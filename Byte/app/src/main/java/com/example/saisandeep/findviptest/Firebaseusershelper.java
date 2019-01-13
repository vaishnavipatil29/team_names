package com.example.saisandeep.findviptest;

import android.support.annotation.NonNull;

import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;

public class Firebaseusershelper {
    private FirebaseDatabase mFirebaseDatabaseusers;
    private DatabaseReference mDatabaseReferenceusers;
    private List<Userinfo> userInfo = new ArrayList<>();
    public List<String> userInfoKeys = new ArrayList<>();


    public Firebaseusershelper() {
        mFirebaseDatabaseusers = FirebaseDatabase.getInstance();
        mDatabaseReferenceusers = mFirebaseDatabaseusers.getReference("users");
    }

    public interface UsersDataStatus{
        void dataIsLoaded(List<Userinfo> usersInfo, List<String> userInfoKeys);
        void dataIsAdded(String newKey);
        void dataIsDeleted();
        void dataIsUpdated();
    }


    public void readusers(final UsersDataStatus usersDataStatus){
        mDatabaseReferenceusers.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                userInfo.clear();
                userInfoKeys.clear();
                for(DataSnapshot keyNode : dataSnapshot.getChildren()){
                    userInfoKeys.add(keyNode.getKey());
                    Userinfo temp = keyNode.getValue(Userinfo.class);
                    userInfo.add(temp);
                }
                usersDataStatus.dataIsLoaded(userInfo,userInfoKeys);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    public void addUser(Userinfo newUser, final UsersDataStatus usersDataStatus){
        final String newKey = mDatabaseReferenceusers.push().getKey();
        mDatabaseReferenceusers.child(newKey).setValue(newUser).addOnSuccessListener(new OnSuccessListener<Void>() {
            @Override
            public void onSuccess(Void aVoid) {
                usersDataStatus.dataIsAdded(newKey);
            }
        });
    }

    public void updateUser(Userinfo update_user, String update_key, final UsersDataStatus usersDataStatus){
        mDatabaseReferenceusers.child(update_key).setValue(update_user).addOnSuccessListener(new OnSuccessListener<Void>() {
            @Override
            public void onSuccess(Void aVoid) {
                usersDataStatus.dataIsUpdated();
            }
        });
    }

}
