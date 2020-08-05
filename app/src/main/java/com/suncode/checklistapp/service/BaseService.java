package com.suncode.checklistapp.service;

import com.suncode.checklistapp.model.Signin;
import com.suncode.checklistapp.model.SigninRequest;
import com.suncode.checklistapp.model.Signup;
import com.suncode.checklistapp.model.SignupRequest;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface BaseService {
    @POST("login/")
    public Call<Signin> signin(@Body SigninRequest signinRequest);

    @POST("register")
    public Call<Signup> signup(@Body SignupRequest signupRequest);

//    @FormUrlEncoded
}
