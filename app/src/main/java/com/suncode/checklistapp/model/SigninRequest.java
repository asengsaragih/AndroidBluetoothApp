package com.suncode.checklistapp.model;

public class SigninRequest {
    private String password;
    private String username;

    public SigninRequest(String password, String username) {
        this.password = password;
        this.username = username;
    }
}
