package com.suncode.checklistapp.model;

import com.google.gson.annotations.SerializedName;

public class Signup {
    @SerializedName("statusCode")
    private int statusCode;

    private String message;

    @SerializedName("errorMessage")
    private String errorMessage;

    private String data;

    public Signup(int statusCode, String message, String errorMessage, String data) {
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

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }
}
