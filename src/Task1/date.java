package Task1;
import javax.xml.crypto.Data;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Calendar;
import java.util.Scanner;

/**
 * Created by Lirveez on 20.02.2018.
 */
public class date {
        public static void main(String[] args) {
         //   Scanner str = new Scanner(System.in);
            Date current = new Date();
            SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ssZ");
            /*while(current==null)   {
                try{
                    System.out.println("Enter string");
                    current = format.parse(str.nextLine());
                }
                catch (ParseException e){
                    System.out.println("Error.");
                }
            }*/

            String DateToStr = format.format(current);
            System.out.println("Current date "+DateToStr+'\n');
            Calendar calendar = Calendar.getInstance();
            calendar.setTime(current);
            Calendar nextDay = (Calendar) calendar.clone();
            nextDay.add(Calendar.DAY_OF_YEAR, 1);
            DateToStr = format.format(nextDay.getTime());
            System.out.println("Next day "+ DateToStr+'\n');
            Calendar weekDays = (Calendar) calendar.clone();
            int numDay = weekDays.get(Calendar.DAY_OF_WEEK) - 1;
            weekDays.add(Calendar.DAY_OF_YEAR, -(numDay-1));
            DateToStr = format.format(weekDays.getTime());
            System.out.println("Monday data "+ DateToStr);
            weekDays.add(Calendar.DAY_OF_YEAR, 6);
            DateToStr = format.format(weekDays.getTime());
            System.out.println("Sunday data "+ DateToStr+'\n');
            Calendar nextMonthDay = (Calendar) calendar.clone();
            nextMonthDay.add(Calendar.MONTH, 1);
            nextMonthDay.add(Calendar.DAY_OF_YEAR, -((nextMonthDay.get(Calendar.DAY_OF_MONTH))-1));
            nextMonthDay.set(Calendar.HOUR, -12);
            nextMonthDay.set(Calendar.MINUTE, 0);
            nextMonthDay.set(Calendar.SECOND, 0);
            DateToStr = format.format(nextMonthDay.getTime());
            System.out.println("Next Month starts from "+DateToStr);
        }
}
