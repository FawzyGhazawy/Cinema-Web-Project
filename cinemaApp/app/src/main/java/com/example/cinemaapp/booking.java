package com.example.cinemaapp;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class booking extends AppCompatActivity {
    String ip, u_id = "0";
    int movieID = 0;
    final static String keyID = "IDKey", keyIP = "IPKey";
    Spinner spinner;
    SharedPreferences sharedPref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking);

        sharedPref = getSharedPreferences("keys", Context.MODE_PRIVATE);
        if (sharedPref.contains(keyIP)) {
            ip = sharedPref.getString(keyIP, "test");
        }
        if (sharedPref.contains(keyID)) {
            u_id = sharedPref.getString(keyID, "test"); //default is test;
        }
        // Get the order ID passed from the previous activity
        Intent intent = getIntent();
        movieID = intent.getIntExtra("movieID", 0);

        // Assuming you have assigned the appropriate IDs to the TextViews in your XML layout file
        TextView titleTextView = findViewById(R.id.title);
        TextView categoryTextView = findViewById(R.id.category);
        TextView durationTextView = findViewById(R.id.duration);
        TextView releaseDateTextView = findViewById(R.id.release_date);
        TextView languageTextView = findViewById(R.id.language);
        TextView posterTextView = findViewById(R.id.poster);
        TextView trailerTextView = findViewById(R.id.trailer);
        TextView rateTextView = findViewById(R.id.rate);
        TextView dateTextView = findViewById(R.id.date);
        TextView startTimeTextView = findViewById(R.id.start_time);
        TextView hallTextView = findViewById(R.id.hall);
        TextView ticketPriceTextView = findViewById(R.id.ticket_price);

        // Make a request to the server to get the order details
        String url = "http://" + ip.trim() + "/cine/961mobile/info.php?movieID=" + movieID;
        RequestQueue queue = Volley.newRequestQueue(this);
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, url, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                try {
                    // Set the text of the TextViews to display the order details
                    JSONObject jsonObject = response.getJSONObject(0);
                    titleTextView.setText(jsonObject.getString("title"));
                    categoryTextView.setText(jsonObject.getString("category"));
                    durationTextView.setText(jsonObject.getString("duration"));
                    releaseDateTextView.setText(jsonObject.getString("releaseDate"));
                    languageTextView.setText(jsonObject.getString("language"));
                    posterTextView.setText(jsonObject.getString("poster"));
                    trailerTextView.setText(jsonObject.getString("trailer"));
                    rateTextView.setText(jsonObject.getString("rate"));
                    dateTextView.setText(jsonObject.getString("date"));
                    startTimeTextView.setText(jsonObject.getString("startTime"));
                    hallTextView.setText(jsonObject.getString("hall"));
                    ticketPriceTextView.setText(jsonObject.getString("ticketPrice"));
                    //locTv.setText(getString(R.string.loc) + " " + jsonObject.getString("current_location"));
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_LONG).show();

            }
        });

        // Add the request to the RequestQueue
        queue.add(jsonArrayRequest);
    }


    public void booknow(View v) {
        Intent i = new Intent(this, book.class);
        i.putExtra("movieID", movieID);
        startActivity(i);
    }
}