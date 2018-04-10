package Task1;

import java.util.Scanner;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * Created by Lirveez on 20.02.2018.
 */
public class emailReg {
    public static void main(String[] args) {
     /*   SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd' T 'HH:mm:ss Z");
        Date current = new Date();
        String DateToStr = format.format(current);*/
        String regex ="^([a-z0-9_\\.-]+)@*([a-z0-9_\\.-]+)\\.([a-z\\.]{2,6})$";
        System.out.println("Enter string");
        Scanner str = new Scanner(System.in);
        String string = str.nextLine();
        Pattern pattern = Pattern.compile(regex);
        Matcher matcher = pattern.matcher(string);

        while (matcher.find()) {
            System.out.println("Found: " + matcher.group(0));
        }
    }
}






