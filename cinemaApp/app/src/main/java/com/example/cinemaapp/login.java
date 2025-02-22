package com.example.cinemaapp;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.cinemaapp.databinding.ActivityLoginBinding;

public class login extends AppCompatActivity {

    private ActivityLoginBinding binding;

    EditText edName, edPassword, edIP;
    public final static String keyName = "nameKey", keyPass = "passKey", keyIP = "IPKey", keyID = "IDKey";
    SharedPreferences sharedPref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        binding = ActivityLoginBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        setSupportActionBar(binding.toolbar);

        edName = (EditText) findViewById(R.id.ed_name);
        edPassword = (EditText) findViewById(R.id.ed_password);
        edIP = (EditText) findViewById(R.id.ed_ip);
        myLoad();

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.

        return true;
    }

/*    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement


        return super.onOptionsItemSelected(item);
    }*/

    private void mySave2(String u_id) {//save credentials on phone
        sharedPref = getSharedPreferences("keys", Context.MODE_PRIVATE);//getSharedPreferences if we have many
        SharedPreferences.Editor editor = sharedPref.edit();
        editor.putString(keyName, edName.getText().toString());//save as key-value
        editor.putString(keyPass, edPassword.getText().toString());
        editor.putString(keyIP, edIP.getText().toString().trim());
        editor.putString(keyID, u_id.trim());
        editor.commit();
    }

    private void myLoad() { //load credentials from phone
        sharedPref = getSharedPreferences("keys", Context.MODE_PRIVATE); //getSharedPreferences if we have many
        if (sharedPref.contains(keyName)) {
            String name = sharedPref.getString(keyName, "test"); //default is test
            edName.setText(name);
        }
        if (sharedPref.contains(keyPass)) {
            String pass = sharedPref.getString(keyPass, "test"); //default is test
            edPassword.setText(pass);
            Toast.makeText(getApplicationContext(), "Credentials loaded", Toast.LENGTH_SHORT).show();
        }
        if (sharedPref.contains(keyIP)) {
            String ip = sharedPref.getString(keyIP, "test"); //default is test
            edIP.setText(ip);
        }

    }

    public void logIn(View v) { //checks credentials in database then takes you to next activity
        if (checker()) {
            //checker should be here
            String n = edName.getText().toString();
            String p = edPassword.getText().toString();
            String ip = edIP.getText().toString();
            String url = "http://" + ip.trim() + "/cine/961mobile/login.php?name=" + n + "&password=" + p;
            RequestQueue queue = Volley.newRequestQueue(this);
            StringRequest request = new StringRequest(Request.Method.GET, url, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    if (response.startsWith("Error")) {
                        Toast.makeText(getApplicationContext(), response, Toast.LENGTH_LONG).show();

                    } else {
                        String u_id = response;//parse int?
                        mySave2(u_id);//save credentials with u_id
                        Toast.makeText(getApplicationContext(), "Welcome!", Toast.LENGTH_SHORT).show();
                        Intent i = new Intent(getApplicationContext(), movies.class);
                        startActivity(i);
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(getApplicationContext(), "Error:" + error.toString(), Toast.LENGTH_SHORT).show();
                }
            });
            queue.add(request);
        }
    }

    protected boolean checker() {
        if (TextUtils.isEmpty(edName.getText().toString())) {
            edName.setError("Empty field!");
        } else if (TextUtils.isEmpty(edPassword.getText().toString())) {
            edPassword.setError("Empty field!");
        } else if (TextUtils.isEmpty(edIP.getText().toString())) {
            edIP.setError("Empty field!");
        } else {
            return true;
        }
        return false;
    }


}