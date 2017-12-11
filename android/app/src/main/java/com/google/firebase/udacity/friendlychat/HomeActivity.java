package com.google.firebase.udacity.friendlychat;

/**
 * Created by paresh on 18/11/17.
 */

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.RelativeLayout;

import com.firebase.ui.auth.AuthUI;
import com.google.firebase.auth.FirebaseAuth;

public class HomeActivity extends AppCompatActivity {


    private FirebaseAuth mFirebaseAuth;
    private String mUsername;
    public static final String ANONYMOUS = "anonymous";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        mFirebaseAuth = FirebaseAuth.getInstance();

        RelativeLayout ask_question = (RelativeLayout)findViewById(R.id.btn_ask_question);
        RelativeLayout join_contest = (RelativeLayout)findViewById(R.id.btn_join_contest);
        RelativeLayout profile = (RelativeLayout)findViewById(R.id.btn_profile);
        RelativeLayout host_contest = (RelativeLayout)findViewById(R.id.btn_host_contest);

        ask_question.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(HomeActivity.this, CourseActivity.class));
            }
        });
        join_contest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(HomeActivity.this, ContestActivity.class));
            }
        });
        profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(HomeActivity.this, ProfileActivity.class));
            }
        });
        host_contest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(HomeActivity.this, HostContest.class));
            }
        });


    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.main_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch(item.getItemId()){
            case R.id.sign_out_menu:
                onSignedOutCleanup();
                AuthUI.getInstance().signOut(this);

                return true;
            default:
                return super.onOptionsItemSelected(item);

        }

    }
    private void onSignedOutCleanup(){
        mUsername = ANONYMOUS;
//        mMessageAdapter.clear();
//        detachDatabaseReadListener();
    }
}
