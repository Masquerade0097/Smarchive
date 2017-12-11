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

public class GroupsActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_group);


        CardView obj1 = (CardView) findViewById(R.id.obj1);
        obj1.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(GroupsActivity.this, XActivity.class);
                startActivity(facultyIntent);

//                Toast.makeText(view.getContext(),"Open the Programming Club",Toast.LENGTH_SHORT).show();
            }
        });

        CardView obj2 = (CardView) findViewById(R.id.obj2);
        obj2.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(GroupsActivity.this, qbActivity.class);
                startActivity(facultyIntent);

//                Toast.makeText(view.getContext(),"Open the Programming Club",Toast.LENGTH_SHORT).show();
            }
        });

        CardView obj3 = (CardView) findViewById(R.id.obj3);
        obj3.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(GroupsActivity.this, qcActivity.class);
                startActivity(facultyIntent);

//                Toast.makeText(view.getContext(),"Open the Programming Club",Toast.LENGTH_SHORT).show();
            }
        });

        Button askit = (Button) findViewById(R.id.btn_ask);
        askit.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Intent facultyIntent = new Intent(GroupsActivity.this, askActivity.class);
                startActivity(facultyIntent);

//                Toast.makeText(view.getContext(),"Open the Programming Club",Toast.LENGTH_SHORT).show();
            }
        });

    }
}
