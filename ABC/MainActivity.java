package com.example.dell.uploadimage;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;

import java.io.BufferedReader;
import java.io.ByteArrayOutputStream;
import android.os.Environment;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Base64;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    InputStream inputStream;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        String sdcardPath = Environment.getExternalStorageDirectory().toString();
        File imgFile = new File(sdcardPath+"/DCIM/Camera/1.jpg");
        Bitmap bitmap = null;
        if(imgFile.exists()) {
            Bitmap unscaledBitmap = ScalingUtilities.decodeFile(imgFile.getAbsolutePath(), 400, 400, ScalingUtilities.ScalingLogic.FIT);
                // Part 2: Scale image
                bitmap = ScalingUtilities.createScaledBitmap(unscaledBitmap, 400, 400, ScalingUtilities.ScalingLogic.FIT);

            //bitmap = BitmapFactory.decodeFile(imgFile.getAbsolutePath());
           // Toast.makeText(getApplicationContext(), Environment.getExternalStorageDirectory().toString(), Toast.LENGTH_LONG).show();
            //bitmap.compress(Bitmap.CompressFormat.JPEG, 50, strea)
            ByteArrayOutputStream stream = new ByteArrayOutputStream();
            bitmap.compress(Bitmap.CompressFormat.PNG, 0, stream);
            byte[] byte_arr = stream.toByteArray();
            String image_str = Base64.encodeToString(byte_arr, 0);
            final ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();

            nameValuePairs.add(new BasicNameValuePair("image", image_str));

            Thread t = new Thread(new Runnable() {

                @Override
                public void run() {
                    try {
                        HttpClient httpclient = new DefaultHttpClient();
                        HttpPost httppost = new HttpPost("http://35.240.232.116/upload_image.php");
                        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                        HttpResponse response = httpclient.execute(httppost);
                        final String the_string_response = convertResponseToString(response);
                        runOnUiThread(new Runnable() {

                            @Override
                            public void run() {
                                Toast.makeText(getApplicationContext(), "Response " + the_string_response, Toast.LENGTH_LONG).show();
                            }
                        });

                    } catch (final Exception e) {
                        runOnUiThread(new Runnable() {

                            @Override
                            public void run() {
                                Toast.makeText(getApplicationContext(), "ERROR " + e.getMessage(), Toast.LENGTH_LONG).show();
                            }
                        });
                        System.out.println("Error in http connection " + e.toString());
                    }
                }
            });
            t.start();

        }
    }

    public String convertResponseToString(HttpResponse response) throws IllegalStateException, IOException {

        String res = "";
        StringBuffer buffer = new StringBuffer();
        inputStream = response.getEntity().getContent();
        final int contentLength = (int) response.getEntity().getContentLength(); //getting content length…..
        runOnUiThread(new Runnable() {

            @Override
            public void run() {
                //Toast.makeText(getApplicationContext(), "contentLength : " + contentLength, Toast.LENGTH_LONG).show();
            }
        });

        if (contentLength < 0){
        }
        else{
            byte[] data = new byte[512];
            int len = 0;
            try
            {
                while (-1 != (len = inputStream.read(data)) )
                {
                    buffer.append(new String(data, 0, len)); //converting to string and appending  to stringbuffer…..
                }
            }
            catch (IOException e)
            {
                e.printStackTrace();
            }
            try
            {
                inputStream.close(); // closing the stream…..
            }
            catch (IOException e)
            {
                e.printStackTrace();
            }
            res = buffer.toString();     // converting stringbuffer to string…..

            final String finalRes = res;
            try {
                // Create a URL for the desired page
                URL url = new URL("http://35.240.232.116/results.txt");

                // Read all the text returned by the server
                BufferedReader in = new BufferedReader(new InputStreamReader(url.openStream()));
                String str;
                while ((str = in.readLine()) != null) {
                    final String finalStr = str;
                    runOnUiThread(new Runnable() {

                        @Override
                        public void run() {
                            final String str1 = finalStr;
                            Toast.makeText(getApplicationContext(), "No of students present : " + finalStr, Toast.LENGTH_LONG).show();
                        }
                    });
                    // str is one line of text; readLine() strips the newline character(s)
                }
                in.close();
            } catch (MalformedURLException e) {
            } catch (IOException e) {
            }

            //System.out.println("Response => " +  EntityUtils.toString(response.getEntity()));
        }
        return res;
    }
}
