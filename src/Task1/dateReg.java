package Task1;
import java.util.Scanner;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
/**
 * Created by Lirveez on 20.02.2018.
 */
public class dateReg {
    public static void main(String[] args) {
        String regex = "[1|2][0-9]{3}-(([0][1-9])|([1][1-2]))-(([0-2][0-9])|[3][0-1])";
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