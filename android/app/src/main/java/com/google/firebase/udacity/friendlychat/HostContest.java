package com.google.firebase.udacity.friendlychat;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

/**
 * Created by paresh on 19/11/17.
 */

public class HostContest extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_host_contest);

        Button btn_submit = (Button)findViewById(R.id.btn_submit);

        btn_submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext() ,"Your context is Hosted",Toast.LENGTH_LONG).show();
                startActivity(new Intent(HostContest.this, HomeActivity.class));
            }
        });
    }
}
