package com.google.firebase.udacity.friendlychat;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.view.View;

/**
 * Created by priyanshu on 18/11/17.
 */

public class CourseActivity extends AppCompatActivity{
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_course);


        CardView obj1 = (CardView) findViewById(R.id.obj1);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj2 = (CardView) findViewById(R.id.obj2);
        obj2.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, Group1Activity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj3 = (CardView) findViewById(R.id.obj3);
        obj3.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj4 = (CardView) findViewById(R.id.obj4);
        obj4.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, Group1Activity.class);
                startActivity(facultyIntent);

            }
        });


    }
}
