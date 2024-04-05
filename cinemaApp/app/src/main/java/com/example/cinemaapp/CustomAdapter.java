package com.example.cinemaapp;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class CustomAdapter extends BaseAdapter {

    String[] title;
    String[] genre;
    String[] date;
    Context context;//mtl this
    JSONArray data;
    String host;
    LayoutInflater inflater = null;

    public CustomAdapter(Context context, JSONArray data, String host) {
        this.context = context;
        this.data = data;
        this.host = host;
        inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    }

    @Override
    public int getCount() {
        return data.length();
    }

    @Override
    public Object getItem(int i) {
        return null;
    }

    @Override
    public long getItemId(int i) {
        return 0;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        final View rowView;
        rowView = inflater.inflate(R.layout.showrow, null);
        TextView tv_t = (TextView) rowView.findViewById(R.id.tvt);
        TextView tv_g = (TextView) rowView.findViewById(R.id.tvg);
        TextView tv_d = (TextView) rowView.findViewById(R.id.tvd);
        //Button remove = (Button) rowView.findViewById(R.id.bt_remove);


        JSONObject ob = data.optJSONObject(i);
        try {
            int movieID = ob.getInt("movieID");
            String t = ob.getString("title");
            tv_t.setText(t);
            String g = ob.getString("category");
            tv_g.setText(g);
            String dateString = ob.getString("releaseDate");
            // Assuming the date string is in the format: "yyyy-MM-dd"
            SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
            Date date = dateFormat.parse(dateString);
            // Format the date as desired, for example: "MMM dd, yyyy"
            SimpleDateFormat displayFormat = new SimpleDateFormat("MMM dd, yyyy");
            String formattedDate = displayFormat.format(date);
            tv_d.setText(formattedDate);

            rowView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    //TextView name=(TextView) rowView.findViewById(R.id.et_name);
                    Intent i = new Intent(context, booking.class);
                    i.putExtra("movieID", movieID);
                    context.startActivity(i);
                    //Toast.makeText(context, formattedDate, Toast.LENGTH_LONG).show();

                }
            });
        } catch (JSONException e) {
            e.printStackTrace();
        } catch (ParseException e) {
            e.printStackTrace();
        }
        return rowView;
    }
}
