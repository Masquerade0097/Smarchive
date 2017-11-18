package com.masquerade.priyanshu.topcoder;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;

/**
 * Created by priyanshu on 18/11/17.
 */

public class ProfileActivity extends AppCompatActivity {

    private static final String TAG = "Oh my god";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        //Intent intent = getIntent();
        //final String cheeseName = intent.getStringExtra(EXTRA_NAME);

        final Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        if(getSupportActionBar() != null ){
            setSupportActionBar(toolbar);
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            Log.d(TAG, "not null re okok");
        }
        else
            Log.d(TAG, "onCreate() No saved state available");




        CollapsingToolbarLayout collapsingToolbar =
                (CollapsingToolbarLayout) findViewById(R.id.collapsing_toolbar);
        collapsingToolbar.setTitle("Overview");

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

        ImageView fb = (ImageView) findViewById(R.id.fb);
        fb.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View view){
                String url = "https://www.facebook.com/timothy.gonsalves.71";
                Intent openFacebook = new Intent(Intent.ACTION_VIEW);
                openFacebook.setData(Uri.parse(url));
                startActivity(openFacebook);

            }
        });

        ImageView youtube = (ImageView) findViewById(R.id.youtube);
        youtube.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View view){
                String url = "http://www.youtube.com/channel/UCSybolnMMi_8vc5OoX36Vwg";
                Intent openYoutube = new Intent(Intent.ACTION_VIEW);
                openYoutube.setData(Uri.parse(url));
                startActivity(openYoutube);

            }
        });

    }

    private void loadBackdrop() {
        final ImageView imageView = (ImageView) findViewById(R.id.backdrop);
        // Glide.with(this).load(Cheeses.getRandomCheeseDrawable()).centerCrop().into(imageView);
        imageView.setImageResource(R.drawable.cheese);
    }


}
