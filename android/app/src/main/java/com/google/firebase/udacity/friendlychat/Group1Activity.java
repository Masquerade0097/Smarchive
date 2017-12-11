package com.google.firebase.udacity.friendlychat;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.Button;

/**
 * Created by priyanshu on 18/11/17.
 */

public class Group1Activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_group1);

//        Button askme = (Button) findViewById(R.id.askForum);
//        askme.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent facultyIntent = new Intent(Group1Activity.this, QuestionActivity.class);
//                startActivity(facultyIntent);
//            }
//        });

        CardView obj1 = (CardView) findViewById(R.id.obj1);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(Group1Activity.this, QActivity.class);
                startActivity(facultyIntent);

            }
        });

        CardView obj2 = (CardView) findViewById(R.id.obj2);
        obj2.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(Group1Activity.this, qbActivity.class);
                startActivity(facultyIntent);

            }
        });

        CardView obj3 = (CardView) findViewById(R.id.obj3);
        obj3.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(Group1Activity.this, qcActivity.class);
                startActivity(facultyIntent);

            }
        });

        CardView obj4 = (CardView) findViewById(R.id.obj4);
        obj4.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(Group1Activity.this, XActivity.class);
                startActivity(facultyIntent);

            }
        });

        CardView obj5 = (CardView) findViewById(R.id.obj5);
        obj5.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(Group1Activity.this, qaActivity.class);
                startActivity(facultyIntent);

            }
        });

        Button askit = (Button) findViewById(R.id.askme);
        askit.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(Group1Activity.this, askActivity.class);
                startActivity(facultyIntent);

//                Toast.makeText(view.getContext(),"Open the Programming Club",Toast.LENGTH_SHORT).show();
            }
        });

    }
}
