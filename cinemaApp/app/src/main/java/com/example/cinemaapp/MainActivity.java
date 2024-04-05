package com.example.cinemaapp;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;

import android.view.View;


import com.example.cinemaapp.databinding.ActivityMainBinding;

import android.view.Menu;
import android.view.MenuItem;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;

public class MainActivity extends AppCompatActivity {

    ListView lvs;
    String ip, u_id;
    final static String keyID = "IDKey", keyIP = "IPKey";
    SharedPreferences sharedPref;
    private ActivityMainBinding binding;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        binding = ActivityMainBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        setSupportActionBar(binding.toolbar);

       /* binding.fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });*/

        lvs = (ListView) findViewById(R.id.lvs);
        sharedPref = getSharedPreferences("keys", Context.MODE_PRIVATE);
        if (sharedPref.contains(keyIP)) {
            ip = sharedPref.getString(keyIP, "test");
        }
        if (sharedPref.contains(keyID)) {
            u_id = sharedPref.getString(keyID, "test"); //default is test;
        }
        getdatafromdb();
    }

    @Override
    protected void onResume() {
        getdatafromdb();
        super.onResume();
    }

    public void getdatafromdb() {
        String url = "http://"+ip.trim() + "/cine/961mobile/getshows.php";
        RequestQueue queue = Volley.newRequestQueue(this);
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, url, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                CustomAdapter adapter = new CustomAdapter(MainActivity.this, response, ip);
                lvs.setAdapter(adapter);


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_LONG).show();
            }
        });

        queue.add(jsonArrayRequest);
    }



}