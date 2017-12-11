package com.google.firebase.udacity.friendlychat;

import android.os.Bundle;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;

/**
 * Created by priyanshu on 18/11/17.
 */

public class ProfileActivity extends AppCompatActivity {


    private FirebaseAuth mFirebaseAuth;
    private static final String TAG = "Oh my god";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        //Intent intent = getIntent();
        //final String cheeseName = intent.getStringExtra(EXTRA_NAME);

        final Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        mFirebaseAuth = FirebaseAuth.getInstance();


        if(getSupportActionBar() != null ){
            setSupportActionBar(toolbar);
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            Log.d(TAG, "not null re okok");
        }
        else
            Log.d(TAG, "onCreate() No saved state available");




        CollapsingToolbarLayout collapsingToolbar =
                (CollapsingToolbarLayout) findViewById(R.id.collapsing_toolbar);
        collapsingToolbar.setTitle("Priyanshu Khandelwal");

        TextView tv_courses = (TextView)findViewById(R.id.tv_courses);
        tv_courses.setText("• IC121\n• IC161P\n• IC150\n• IC150P");

        loadBackdrop();

        CardView vision = (CardView) findViewById(R.id.vision);
        vision.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View view){
//                Intent facultyIntent = new Intent(DemoActivity.this,FacultyActivity.class);
//                startActivity(facultyIntent);

                Toast.makeText(view.getContext(),"Open the List Of Numbers",Toast.LENGTH_SHORT).show();
            }
        });

        CardView mission = (CardView) findViewById(R.id.mission);
        mission.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View view){
//                Intent facultyIntent = new Intent(DemoActivity.this,FacultyActivity.class);
//                startActivity(facultyIntent);

                Toast.makeText(view.getContext(),"JUst a tupple",Toast.LENGTH_SHORT).show();
            }
        });


    }

    private void loadBackdrop() {
        final ImageView imageView = (ImageView) findViewById(R.id.backdrop);
        // Glide.with(this).load(Cheeses.getRandomCheeseDrawable()).centerCrop().into(imageView);
        imageView.setImageResource(R.drawable.cheese);
    }


}
