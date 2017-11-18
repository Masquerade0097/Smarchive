package com.masquerade.priyanshu.topcoder;

import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.widget.ImageView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

/**
 * Created by priyanshu on 18/11/17.
 */

public class ImageActivity extends AppCompatActivity{

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Bundle extras = getIntent().getExtras();


        Uri imageUri = Uri.parse(extras.getString("imageUri"));

        ImageView imageFullScreen = (ImageView) findViewById(R.id.imageFullscreen);

        Glide.with(imageFullScreen.getContext())
                .load(imageUri)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imageFullScreen);

    }

}
