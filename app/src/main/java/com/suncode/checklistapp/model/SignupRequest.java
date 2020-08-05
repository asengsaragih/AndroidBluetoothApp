package com.suncode.checklistapp.model;

public class SignupRequest {
    private String email;
    private String password;
    private String username;

    public SignupRequest(String email, String password, String username) {
        this.email = email;
        this.password = password;
        this.username = username;
    }
}
