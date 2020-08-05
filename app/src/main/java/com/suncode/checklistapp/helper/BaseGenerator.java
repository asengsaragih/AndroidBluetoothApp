package com.suncode.checklistapp.helper;

import com.suncode.checklistapp.constant.Base;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class BaseGenerator {

    public static Retrofit build() {
        Retrofit.Builder builder = new Retrofit.Builder()
                .baseUrl(Base.BASE_URL)
                .addConverterFactory(GsonConverterFactory.create());

        Retrofit retrofit = builder.build();
        return retrofit;
    }
}
