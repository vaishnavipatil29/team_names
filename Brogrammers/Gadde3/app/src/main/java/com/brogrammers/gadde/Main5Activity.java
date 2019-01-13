package com.brogrammers.gadde;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Main5Activity extends AppCompatActivity {

    private Button b1;
    private Button b2;
    private Button b3;
    private Button b4;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main5);


        b1=(Button)findViewById(R.id.btn8);
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(Main5Activity.this,Main9Activity.class);
                startActivity(i);
            }
        });

        b2=(Button)findViewById(R.id.btn9);
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i1 = new Intent(Main5Activity.this,Main10Activity.class);
                startActivity(i1);
            }
        });

        b3=(Button)findViewById(R.id.btn14);
        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i2 = new Intent(Main5Activity.this,Main15Activity.class);
                startActivity(i2);
            }
        });

        b4=(Button)findViewById(R.id.btn15);
        b4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i3 = new Intent(Main5Activity.this,Main16Activity.class);
                startActivity(i3);
            }
        });



    }
}
