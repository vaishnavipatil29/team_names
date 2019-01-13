package com.example.saisandeep.findviptest;

import android.animation.Animator;
import android.animation.AnimatorListenerAdapter;
import android.annotation.TargetApi;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.support.annotation.NonNull;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.app.LoaderManager.LoaderCallbacks;

import android.content.CursorLoader;
import android.content.Loader;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;

import android.os.Build;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.text.TextUtils;
import android.view.KeyEvent;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.inputmethod.EditorInfo;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;


public class LoginActivity extends AppCompatActivity  {
    EditText username;
    EditText password;
    Button signin;
    TextView createaccount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
         username = (EditText)findViewById(R.id.username);

         password = (EditText)findViewById(R.id.password);
         signin = (Button)findViewById(R.id.email_sign_in_button);
         createaccount = (TextView)findViewById(R.id.create_account);

        new Firebaselogindetailhelper().readlogin(new Firebaselogindetailhelper.Logindatastatus() {
            @Override
            public void dataisloaded(List<LoginInfo> logindetails, List<String> logindetailkeys) {
                copydetails(logindetails,logindetailkeys);
            }

            @Override
            public void dataisadded(String newkey) {

            }

            @Override
            public void dataisdeleted() {

            }

            @Override
            public void dataisupdated() {

            }
        });
    }

    String user_username = "";
    String user_password = "";
    public List<LoginInfo> copy_logindatails = new ArrayList<>();
    public List<String> copy_logindatailkeys = new ArrayList<>();

    public void readcredentials(View view){
        user_username = username.getText().toString();
        user_password = password.getText().toString();
        boolean ans = authorise(user_username,user_password);
        if(ans == true){
            Intent intent =new Intent(LoginActivity.this,MainActivity.class);
            intent.putExtra("username",user_username);
            startActivity(intent);
        }
    }

    public void copydetails(List<LoginInfo> L, List<String> K){
        copy_logindatails.clear();
        copy_logindatailkeys.clear();
        for(int i=0;i<L.size();i++){
            copy_logindatails.add(L.get(i));
        }
        for(int i=0;i<K.size();i++){
            copy_logindatailkeys.add(K.get(i));
        }
    }

    public boolean authorise(String U,String P){
        boolean ans = false;
        boolean TempU = false;
        boolean TempP = false;
        for(int i=0;i<copy_logindatails.size();i++){
            if(copy_logindatails.get(i).getUsername().equals(U)){
                TempU = true;
                if(copy_logindatails.get(i).getPassword().equals(P)){
                    TempP = true;
                }
            }
        }
        if(TempP == true){
            ans = true;
        }
        if(TempP == false && TempU == true){
            Toast.makeText(this, "Incorrect password", Toast.LENGTH_SHORT).show();
        }

        if(TempU == false){
            Toast.makeText(this, "Username doesnot exist", Toast.LENGTH_SHORT).show();
        }

        return ans;
    }


}

