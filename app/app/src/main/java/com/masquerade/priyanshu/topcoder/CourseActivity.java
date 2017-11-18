package com.masquerade.priyanshu.topcoder;

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
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj3 = (CardView) findViewById(R.id.obj3);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj4 = (CardView) findViewById(R.id.obj4);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj5 = (CardView) findViewById(R.id.obj5);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj6 = (CardView) findViewById(R.id.obj6);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj7 = (CardView) findViewById(R.id.obj1);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj8 = (CardView) findViewById(R.id.obj7);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

           }
        });
        CardView obj9 = (CardView) findViewById(R.id.obj8);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });
        CardView obj10 = (CardView) findViewById(R.id.obj10);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(CourseActivity.this, GroupsActivity.class);
                startActivity(facultyIntent);

            }
        });


    }
}
