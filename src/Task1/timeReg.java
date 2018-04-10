package Task1;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * Created by Lirveez on 20.02.2018.
 */
public class timeReg {
    public static void main(String[] args) {
     /*   SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd' T 'HH:mm:ss Z");
        Date current = new Date();
        String DateToStr = format.format(current);*/
        String regex ="[1-9][0-9]{3}[-](([0][1-9])|([1][1-2]))-(([0-2][0-9])|[3][0-1])[ ][t|T][ ](([0|1][0-9])|([2][0-3]))([:]([0-5][0-9])){2}[ ][+|-][0-9]{2}[0-5][0]";
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
