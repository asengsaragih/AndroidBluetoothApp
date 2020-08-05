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
import com.suncode.checklistapp.model.SigninRequest;
import com.suncode.checklistapp.model.Signup;
import com.suncode.checklistapp.service.BaseService;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class SigninActivity extends AppCompatActivity {

    private EditText mUsernameEditText, mPasswordEditText;
    private Button mSigninButton, mSignupIntentButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signin);

        mUsernameEditText = findViewById(R.id.editTextSigninUsername);
        mPasswordEditText = findViewById(R.id.editTextSigninPassword);

        mSigninButton = findViewById(R.id.buttonSigninLogin);
        mSignupIntentButton = findViewById(R.id.buttonIntentSignup);

        mSignupIntentButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplicationContext(), SignupActivity.class));
            }
        });

        mSigninButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                login();
            }
        });
    }

    private void login() {
        if (TextUtils.isEmpty(mPasswordEditText.getText().toString()) || TextUtils.isEmpty(mUsernameEditText.getText().toString())) {
            shortToast("ISI FORM");
            return;
        }

        SigninRequest request = new SigninRequest(mPasswordEditText.getText().toString(), mUsernameEditText.getText().toString());
        BaseService service = BaseGenerator.build().create(BaseService.class);

        Call<Signin> call = service.signin(request);

        call.enqueue(new Callback<Signin>() {
            @Override
            public void onResponse(Call<Signin> call, Response<Signin> response) {
                Log.d("CHECKTAG", String.valueOf(response.code()));

                if (response.code() == 200) {
                    Signin datas = response.body();
                    Signin.data token = datas.getData();
                    shortToast("Token : " + token.getToken());
                } else {
                    shortToast("ACCOUNT NOT MATCH");
                }

//
//                Log.d("CHECKTAG", datas.getMessage());
//                Log.d("CHECKTAG", datas.getMessage());
//
//                Signin.data token = datas.getData();
//                Log.d("CHECKTAG", token.getToken());

            }

            @Override
            public void onFailure(Call<Signin> call, Throwable t) {

            }
        });
    }

    private void shortToast(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }
}