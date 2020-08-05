package com.suncode.checklistapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.suncode.checklistapp.helper.BaseGenerator;
import com.suncode.checklistapp.model.Signin;
import com.suncode.checklistapp.model.Signup;
import com.suncode.checklistapp.model.SignupRequest;
import com.suncode.checklistapp.service.BaseService;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class SignupActivity extends AppCompatActivity {

    private EditText mEmail, mPassword, mUsername;
    private Button mDaftar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signup);

        mEmail = findViewById(R.id.editTextSignupEmail);
        mPassword = findViewById(R.id.editTextSignupPassword);
        mUsername = findViewById(R.id.editTextSignupFullname);

        mDaftar = findViewById(R.id.buttonDaftarNow);

        mDaftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                daftar();
            }
        });
    }

    private void daftar() {
        if (TextUtils.isEmpty(mEmail.getText().toString()) || TextUtils.isEmpty(mUsername.getText().toString()) || TextUtils.isEmpty(mPassword.getText().toString())) {
            shortToast("ISI FORM");
            return;
        }

        SignupRequest request = new SignupRequest(mEmail.getText().toString(), mPassword.getText().toString(), mUsername.getText().toString());

        BaseService service = BaseGenerator.build().create(BaseService.class);

        Call<Signup> call = service.signup(request);

        call.enqueue(new Callback<Signup>() {
            @Override
            public void onResponse(Call<Signup> call, Response<Signup> response) {
                Log.d("CHECKTAG", String.valueOf(response.code()));

                if (response.code() == 200) {
                    shortToast("Berhasil Daftar, Silahkan Login Kembali");
                    finish();

                } else if (response.code() == 400) {
                    shortToast("User sudah ada");
                }

            }

            @Override
            public void onFailure(Call<Signup> call, Throwable t) {

            }
        });
    }

    private void shortToast(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }
}