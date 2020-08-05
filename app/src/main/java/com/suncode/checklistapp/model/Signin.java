package com.suncode.checklistapp.model;

import com.google.gson.annotations.SerializedName;

public class Signin {

    @SerializedName("statusCode")
    private int statusCode;

    private String message;

    @SerializedName("errorMessage")
    private String errorMessage;

    private data data;

    public Signin(int statusCode, String message, String errorMessage, Signin.data data) {
        this.statusCode = statusCode;
        this.message = message;
        this.errorMessage = errorMessage;
        this.data = data;
    }

    public int getStatusCode() {
        return statusCode;
    }

    public void setStatusCode(int statusCode) {
        this.statusCode = statusCode;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getErrorMessage() {
        return errorMessage;
    }

    public void setErrorMessage(String errorMessage) {
        this.errorMessage = errorMessage;
    }

    public Signin.data getData() {
        return data;
    }

    public void setData(Signin.data data) {
        this.data = data;
    }

    public class data {
        private String token;

        public data(String token) {
            this.token = token;
        }

        public String getToken() {
            return token;
        }

        public void setToken(String token) {
            this.token = token;
        }
    }
}
