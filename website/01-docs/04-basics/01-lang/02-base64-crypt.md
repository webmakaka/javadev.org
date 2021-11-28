---
layout: page
title: Java Base64 Crypt
description: Java Base64 Crypt
keywords: Java Base64 Crypt
permalink: /lang/basics/base64-crypt/
---

<br/>

# [Java Basics] [Crypt] Base64

    import java.io.UnsupportedEncodingException;
    import java.util.Base64;

    public class Base64Crypt {

        public static String encrypt(String str) {
            try {
                return Base64.getEncoder().encodeToString(str.getBytes("utf-8"));
            } catch (UnsupportedEncodingException e) {
                return "";
            }
        }

        public static String decrypt(String str) {

            try {
                byte[] base64decodedBytes = Base64.getDecoder().decode(str);
                String res = new String(base64decodedBytes, "utf-8");
                return res;

            } catch (UnsupportedEncodingException e) {
                return "";
            }

        }

    } // The End of Class;
