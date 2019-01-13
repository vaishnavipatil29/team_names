package com.example.saisandeep.findviptest;

import android.support.annotation.NonNull;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;

public class Firebasebssidhelper {
    private FirebaseDatabase mfirebaseDatabaseBssid;
    private DatabaseReference mdatabaseReferenceBssid;
    private List<Bssidinfo> bssidinfo = new ArrayList<>();
    public  List<String> bssid_keys = new ArrayList<>();



    public Firebasebssidhelper() {
        mfirebaseDatabaseBssid = FirebaseDatabase.getInstance();
        mdatabaseReferenceBssid = mfirebaseDatabaseBssid.getReference("bssid");
    }

    public interface BssidDataStatus{
        void dataIsLoaded(List<Bssidinfo> bssidInfo, List<String> bssid_keys);
        void dataIsAdded();
        void dataIsDeleted();
        void dataIsUpdated();
    }


    public void readBssid(final BssidDataStatus bssidDataStatus){
        mdatabaseReferenceBssid.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                bssidinfo.clear();
                bssid_keys.clear();
                for(DataSnapshot keyNode : dataSnapshot.getChildren()){

                    bssid_keys.add(keyNode.getKey());
                    Bssidinfo temp = keyNode.getValue(Bssidinfo.class);
                    bssidinfo.add(temp);
                }
                bssidDataStatus.dataIsLoaded(bssidinfo,bssid_keys);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }


}
