package com.google.firebase.udacity.friendlychat;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

/**
 * Created by priyanshu on 18/11/17.
 */

public class SatisfiedActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stilldoubt);


        Button archive = (Button) findViewById(R.id.searchArchive);
        archive.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(),"This feature is implemented in web interface",Toast.LENGTH_SHORT).show();
            }
        });

        Button ask = (Button) findViewById(R.id.askForum);
        ask.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(SatisfiedActivity.this, CourseActivity.class);
                startActivity(facultyIntent);

            }
        });



        Button suggestion = (Button) findViewById(R.id.searchInternet);
        suggestion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Toast.makeText(getApplicationContext(),"This feature is implemented in web interface",Toast.LENGTH_SHORT).show();
            }
        });







    }


}
