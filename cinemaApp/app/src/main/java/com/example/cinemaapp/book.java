package com.example.cinemaapp;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.Toast;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

public class book extends AppCompatActivity {
    String ip, u_id = "0";
    int movieID = 0;
    EditText edticketnbr, edcardnumber, edcardexp, edcoupon;
    Spinner schoolSpinner;
    RadioButton rb_csh, rb_cr;
    CheckBox cb_student;
    final static String keyID = "IDKey", keyIP = "IPKey";
    SharedPreferences sharedPref;

    @SuppressLint({"MissingInflatedId", "ResourceType"})
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_book);

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

        edticketnbr = (EditText) findViewById(R.id.ed_ticket2);
        cb_student = (CheckBox) findViewById(R.id.cb_student);
        rb_cr = (RadioButton) findViewById(R.id.rb_credit);
        rb_csh = (RadioButton) findViewById(R.id.rb_cash);
        edcardnumber = (EditText) findViewById(R.id.card_nbr);
        edcardexp = (EditText) findViewById(R.id.exp_date);
        edcoupon = (EditText) findViewById(R.id.cp_code);

        String[] schoolOptions = {
                "Lebanese International University - Tripoli Campus",
                "Lebanese International University - Beirut Campus"
        };
        schoolSpinner = findViewById(R.id.school);
        ArrayAdapter<String> adapter = new ArrayAdapter<>(this, android.R.layout.simple_spinner_item, schoolOptions);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        schoolSpinner.setAdapter(adapter);
        /*TextView spinnerTextView = schoolSpinner.findViewById(android.R.id.text1);
        spinnerTextView.setTextColor(Color.WHITE);*/

    }

    public void book(View view) {
        // Define the base URL of the PHP script
        if (TextUtils.isEmpty(edticketnbr.getText().toString())) {
            edticketnbr.setError("Empty field!");
            return;
        }
        String baseUrl = "http://" + ip.trim() + "/cine/961mobile/booking.php";

        String t = edticketnbr.getText().toString();
        String code = "0";
        String cardNumber = "0", cardExpDate = "0";
        String payment = "Cash";
        if (rb_cr.isChecked()) {
            if (TextUtils.isEmpty(edcardnumber.getText().toString())) {
                edcardnumber.setError("Empty field!");
                return;
            }
            if (TextUtils.isEmpty(edcardexp.getText().toString())) {
                edcardexp.setError("Empty field!");
                return;
            }
            payment = "Credit Card";
            cardNumber = edcardnumber.getText().toString();
            cardExpDate = edcardexp.getText().toString();
        }
        // Append the query parameters to the base URL
        String url = baseUrl + "?uid=" + u_id + "&shid=+" + movieID + "&numberOfTicket=" + t + "&payment=" + payment + "&cardNumber=" + cardNumber + "&cardExpDate=" + cardExpDate;

        if (cb_student.isChecked()) {
            if (TextUtils.isEmpty(edcoupon.getText().toString())) {
                edcoupon.setError("Empty field!");
                return;
            }
            code = edcoupon.getText().toString();
            String selectedSchool = schoolSpinner.getSelectedItem().toString();
            url = url + "&code=" + code + "&school=" + selectedSchool;
        }

        // Create a new request queue
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());

        // Create a new string request to send the selected value to the PHP script
        StringRequest stringRequest = new StringRequest(Request.Method.GET, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Toast.makeText(getApplicationContext(), response, Toast.LENGTH_LONG).show();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_LONG).show();
            }
        });

        // Add the request to the request queue
        queue.add(stringRequest);


    }
}