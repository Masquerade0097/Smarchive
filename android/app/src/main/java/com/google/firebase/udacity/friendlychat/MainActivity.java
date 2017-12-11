/**
 * Copyright Google Inc. All Rights Reserved.
 * <p/>
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * <p/>
 * http://www.apache.org/licenses/LICENSE-2.0
 * <p/>
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package com.google.firebase.udacity.friendlychat;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.widget.Toast;

import com.firebase.ui.auth.AuthUI;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    private static final String TAG = "MainActivity";
    private static final String LOG_TAG = "MainActivity";

    public static final String ANONYMOUS = "anonymous";
    public static final int DEFAULT_MSG_LENGTH_LIMIT = 1000;
    private static final int RC_SIGN_IN = 123;
    private static final int RC_PHOTO_PICKER =  2;
//
//    private ListView mMessageListView;
//    private MessageAdapter mMessageAdapter;
//    private ProgressBar mProgressBar;
//    private ImageButton mPhotoPickerButton;
//    private EditText mMessageEditText;
//    private Button mSendButton;
//    private TextView emptyTextView;

    private String mUsername;

    // Firebase instance variables
//    private FirebaseDatabase mFirebaseDatabase;
//    private DatabaseReference mMessagesDatabaseReference;
//    private ChildEventListener mChildEventListener;
    private FirebaseAuth mFirebaseAuth;
    private FirebaseAuth.AuthStateListener mAuthStateListener;
//    private StorageReference mChatPhotosStorageReference;
//    private FirebaseStorage mFirebaseStorage;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mUsername = ANONYMOUS;


        // Initialize Firebase components
//        mFirebaseDatabase = FirebaseDatabase.getInstance();
        mFirebaseAuth = FirebaseAuth.getInstance();

        Intent facultyIntent = new Intent(MainActivity.this, HomeActivity.class);
        startActivity(facultyIntent);

        /*AuthStateListener helps to find out that the user is signed in or signed out and accordingly
        we need to display login screen or chat screen*/
        mAuthStateListener = new FirebaseAuth.AuthStateListener() {
            @Override
            public void onAuthStateChanged(@NonNull FirebaseAuth firebaseAuth) {
                FirebaseUser user = firebaseAuth.getCurrentUser();
                List<AuthUI.IdpConfig> providers;
                providers = new ArrayList<>();

                if(user != null){
                    //user is signed in
//                    Toast.makeText(MainActivity.this, "User is signed in", Toast.LENGTH_SHORT).show();
                    onSignedInInitialize(user.getDisplayName());

                }
                else{
                    onSignedOutCleanup();

                    providers.add(new AuthUI.IdpConfig.Builder(AuthUI.EMAIL_PROVIDER).build());
                    providers.add(new AuthUI.IdpConfig.Builder(AuthUI.GOOGLE_PROVIDER).build());
                    startActivityForResult(
                            AuthUI.getInstance()
                                    .createSignInIntentBuilder()
                                    .setIsSmartLockEnabled(false)
                                    .setProviders(
                                            providers)
                                    .build(),
                            RC_SIGN_IN);
                }
            }
        };
    }


    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data){
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == RC_SIGN_IN){
            if(resultCode == RESULT_OK){
                Toast.makeText(this, "Signed In!", Toast.LENGTH_SHORT).show();
            }else if(resultCode == RESULT_CANCELED){
                Toast.makeText(this, "Sign In Cancelled!", Toast.LENGTH_SHORT).show();
                finish();
            }
        }else if(requestCode == RC_PHOTO_PICKER && resultCode == RESULT_OK){

        }
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
                AuthUI.getInstance().signOut(this);
                return true;
            default:
                return super.onOptionsItemSelected(item);

        }

    }

    @Override
    protected void onPause(){
        super.onPause();
        if(mAuthStateListener != null) {
            mFirebaseAuth.removeAuthStateListener(mAuthStateListener);
        }
//        detachDatabaseReadListener();
//        mMessageAdapter.clear();
    }

    @Override
    protected void onResume(){
        super.onResume();
        mFirebaseAuth.addAuthStateListener(mAuthStateListener);
    }

    private void onSignedInInitialize(String username){
//since we given read permissions to signed in users only so this code will help him to read messages

        mUsername = username;
        Log.v(LOG_TAG,"Here im bitches" + mUsername);
//        attachDatabaseReadListener();
    }

    private void onSignedOutCleanup(){
        mUsername = ANONYMOUS;
//        mMessageAdapter.clear();
//        detachDatabaseReadListener();
    }

    private void detachDatabaseReadListener(){
//        if( mChildEventListener != null){
////            mMessagesDatabaseReference.removeEventListener(mChildEventListener);
//            mChildEventListener = null;
//        }
    }
}