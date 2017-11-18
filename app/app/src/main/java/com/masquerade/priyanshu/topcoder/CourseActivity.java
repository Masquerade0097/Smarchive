package com.masquerade.priyanshu.topcoder;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.util.Log;
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
                String LOG_TAG = " hahahah ";
                Log.v(LOG_TAG,"im inside you");
                Intent facultyIntent1 = new Intent(CourseActivity.this, ContestActivity.class);
                startActivity(facultyIntent1);

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
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj5 = (CardView) findViewById(R.id.obj5);
        obj5.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj6 = (CardView) findViewById(R.id.obj6);
        obj6.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj7 = (CardView) findViewById(R.id.obj7);
        obj7.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj8 = (CardView) findViewById(R.id.obj8);
        obj8.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

           }
        });
        CardView obj9 = (CardView) findViewById(R.id.obj9);
        obj9.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj10 = (CardView) findViewById(R.id.obj10);
        obj10.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });


    }
}
