import jakarta.servlet.ServletException;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

public class FirstServlet extends HttpServlet
{
    private static final long serialVersionUID = 1L;

    public void doGet(HttpServletRequest request, HttpServletResponse response)
    throws IOException, ServletException
    {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String userName = request.getParameter("userName");
        Cookie cookie = new Cookie("userName", userName);
        response.addCookie(cookie);
        cookie.setMaxAge(-1);
        
        String visitCountKey = new String("visitCount");
	    String userIDKey = new String("userID");
        HttpSession session = request.getSession(true);
        Cookie[] ck = request.getCookies(); 
        String name = ck[0].getValue();
        String userID = name+"_1487P";
    	String title = "Welcome Back "+name;
    	Date createTime = new Date(session.getCreationTime());
    	Date lastAccessTime = new Date(session.getLastAccessedTime());
    	Integer visitCount = new Integer(0);
    	if (session.isNew()) 
        {
            title = "FestHub Session Details";
            session.setAttribute(userIDKey, userID);
    	    visitCount = visitCount + 1;
      	    session.setAttribute(visitCountKey,  visitCount);
        } 
        else 
        {
            visitCount = (Integer)session.getAttribute(visitCountKey);
          	visitCount = visitCount + 1;
          	userID = (String)session.getAttribute(userIDKey);
          	session.setAttribute(visitCountKey,  visitCount);
      	}
            String docType = "<!doctype html public \"-//w3c//dtd html 4.0 " + "transitional//en\">\n";
            out.println(docType + "<html>\n" + "<head><title>" + title + "</title></head>\n" +
            "<body bgcolor = \"white\" margin = \"50px\">\n" +
      	    "<h2 align = \"center\">Customers Information</h2>\n" +
            "<h3 align = \"center\">Welcome " +userName + "</h3>\n" +
      	    "<table border = \"1\" align = \"center\" width=\"75%\">\n" +
      	    "<tr bgcolor = \"red\">\n" +
      	    "  <th>Session info</th><th>value</th></tr>\n" +
      	    "<tr>\n" + "  <td>Session Id</td>\n" + "  <td>" + session.getId() + "</td></tr>\n" +
            "<tr>\n" + "  <td>Ordered Time</td>\n" + "  <td>" + createTime + "</td></tr>\n" +
      	    "<tr>\n" + "  <td>Customer ID</td>\n" + "  <td>" + userID + "</td></tr>\n" +
      	    "<tr>\n" + "  <td>Last Access Time</td>\n" + "  <td>" +lastAccessTime  + "</td></tr>\n" +   
            //"<tr>\n" + "  <td>Visit Count</td>\n" + "  <td>" +visitCount  + "</td></tr>\n" +   
            "</table>\n" +"</body></html>" ); 
        
       
        /*PrintWriter out = response.getWriter();

        HttpSession session = request.getSession(true);

        // print session info

        Date created = new Date(session.getCreationTime()); 
        Date accessed = new Date(session.getLastAccessedTime());
        out.println("ID " + session.getId());
        out.println("Created: " + created);
        out.println("Last Accessed: " + accessed);

        // set session info if needed

        String dataName = request.getParameter("dataName");
        if (dataName != null && dataName.length() > 0) {
            String dataValue = request.getParameter("dataValue");
            session.setAttribute(dataName, dataValue);
        }

        // print session contents

        Enumeration e = session.getAttributeNames();
        while (e.hasMoreElements()) {
            String name = (String)e.nextElement();
            String value = session.getAttribute(name).toString();
            out.println(name + " = " + value);
        }
        
        out.print("<form action='servlet2'>");
        out.print("<input type='submit' value='go'>");
        out.print("</form>");

        out.close();
        */
        
        /*public void init() throws ServletException
    {
        System.out.println("-----------------------------------------");
        System.out.println(" Init method is called in " + this.getClass().getName());
        System.out.println("--------------------------------------");
    }

    public void doGet( HttpServletRequest request, HttpServletResponse response )throws ServletException, IOException
    {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String userName = request.getParameter("userName");
        out.print("Welcome " + userName);

        Cookie cookie = new Cookie("userName", userName);
        response.addCookie(cookie);

        out.print("<form action='servlet2'>");
        out.print("<input type='submit' value='go'>");
        out.print("</form>");

        out.close();
    }

    public void destroy()
    {
        System.out.println("-----------------------------------------");
        System.out.println(" destroy method is called in " + this.getClass().getName());
        System.out.println("-----------------------------------------");
    }
    */
    }
}